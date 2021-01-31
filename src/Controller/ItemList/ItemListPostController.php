<?php

declare(strict_types=1);

namespace Devaway\Controller\ItemList;


use Devaway\ToDoList\Application\ItemListCreator;
use Devaway\ToDoList\Domain\ItemName;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class ItemListPostController
{

    public function __construct(private ItemListCreator $creator)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $name = $request->get("name");

        $this->creator->create(name: new ItemName($name));
        return new JsonResponse(
            [
                'status' => 'ok'
            ]
        );
    }
}
