<?php

namespace App\Http\Controllers;

use App\Enums\ContentStatus;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use App\Services\ContentService;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ContentController extends Controller
{
    use AuthorizesRequests;

    public function __construct(private ContentService $contentService)
    {
    }

    public function index()
    {
        \Illuminate\Support\Facades\Gate::authorize('viewAny', Content::class);
        $contents = Content::latest()->paginate();
        return response()->json($contents);
    }

    public function show(Content $content)
    {
        \Illuminate\Support\Facades\Gate::authorize('view', $content);
        return response()->json($content->load('sections'));
    }

    public function store(StoreContentRequest $request)
    {
        \Illuminate\Support\Facades\Gate::authorize('create', Content::class);
        $data = $request->validated();
        $data['author_id'] = $request->user()->id;
        $data['status'] = ContentStatus::DRAFT;

        $content = Content::create($data);

        return response()->json($content, 201);
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        \Illuminate\Support\Facades\Gate::authorize('update', $content);
        $content->update($request->validated());

        return response()->json($content);
    }

    public function destroy(Content $content)
    {
        \Illuminate\Support\Facades\Gate::authorize('delete', $content);
        $content->delete();

        return response()->noContent();
    }

    public function submitForReview(Content $content)
    {
        $this->contentService->submitForReview($content);
        return response()->json($content->fresh());
    }

    public function approve(Content $content)
    {
        $this->contentService->approve($content);
        return response()->json($content->fresh());
    }

    public function schedule(Request $request, Content $content)
    {
        $request->validate(['published_at' => 'required|date']);
        $this->contentService->schedule($content, new \DateTime($request->published_at));
        return response()->json($content->fresh());
    }

    public function publish(Content $content)
    {
        $this->contentService->publish($content);
        return response()->json($content->fresh());
    }

    public function archive(Content $content)
    {
        $this->contentService->archive($content);
        return response()->json($content->fresh());
    }
}
