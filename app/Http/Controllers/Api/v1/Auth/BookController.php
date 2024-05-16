<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Domain\Book\DTO\CreateBookDTO;
use App\Domain\Book\DTO\UpdateBookDTO;
use App\Domain\Book\Services\BookService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Book\CreateBookRequest;
use App\Http\Requests\Api\Book\UpdateBookRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private int $totalPage = 10;

    public function __construct(
        protected BookService $service
    ) {
        //
    }

    public function index(Request $request): JsonResponse
    {
        $books = $this->service->paginate(
            page: $request->get('page') ?? 1,
            totalPerPage: $this->totalPage,
            filter: $request->get('filter')
        );

        return response()->json($books, 200);
    }

    public function store(CreateBookRequest $request): JsonResponse
    {
        $book = $this->service->new(
            CreateBookDTO::makeFromRequest($request)
        );

        if (! $book) {
            return response()->json(['message' => 'Book not created'], 501);
        }

        return response()->json(['message' => 'Book stored successful'], 201);
    }

    public function update(UpdateBookRequest $request, $id): JsonResponse
    {
        if(! $book = $this->service->findOne($id)) {
            return redirect()->back();
        }

        if (! $this->service->update(
            UpdateBookDTO::makeFromRequest($request, $book->id)
        )) {
            return response()->json(['message' => 'Book not updated'], 501);
        }

        return response()->json(['message' => 'Book updated successful'], 200);
    }

    public function show(string|int $id): JsonResponse
    {
        if(! $book = $this->service->findOne($id)) {
            return response()->json(['message' => 'Book not founded'], 404);
        }

        return response()->json($book, 200);
    }

    public function destroy(string|int $id): JsonResponse
    {
        if (! $this->service->findOne($id)) {
            return response()->json(['message' => 'Book not founded'], 404);
        }

        $this->service->delete($id);

        return response()->json(['message' => 'Book deleted successful'], 200);
    }
}
