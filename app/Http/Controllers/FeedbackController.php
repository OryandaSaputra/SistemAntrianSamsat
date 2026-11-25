<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));

        $feedbacks = Feedback::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('message', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.feedback.index', compact('feedbacks', 'search'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Feedback::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Umpan balik berhasil dikirim. Terima kasih.',
        ]);
    }

    public function show(int $id)
    {
        return response()->json(Feedback::findOrFail($id));
    }

    public function destroy(int $id)
    {
        Feedback::findOrFail($id)->delete();

        return redirect()->route('dashboard.feedback.index')->with('success', 'Umpan balik berhasil dihapus.');
    }
}
