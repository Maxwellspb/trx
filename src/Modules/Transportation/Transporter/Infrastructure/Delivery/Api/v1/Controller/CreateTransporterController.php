<?php

namespace App\Modules\Transportation\Transporter\Infrastructure\Delivery\Api\v1\Controller;

use App\Modules\Company\Infrastructure\Delivery\Api\v1\Request\CreateCompanyRequestDto;
use App\Modules\Company\Infrastructure\Delivery\Api\v1\Response\CompanyResponseDto;
use App\Modules\Transportation\Transporter\Infrastructure\Delivery\Api\v1\Request\CreateTransporterRequestDto;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route(path: '/api/v1/transporters', name:'api:v1:transporters_create', methods: ['POST'])]
class CreateTransporterController extends AbstractController
{
    public function __construct(
        private readonly SerializerInterface $serializer,
    ) {}

    #[OA\Post(
        path: '/api/v1/transporters',
        summary: 'Создание нового перевозчика',
        tags: ['Transporters']
    )]
    #[OA\RequestBody(
        description: 'Данные для создания перевозчика',
        required: true,
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(ref: '#/components/schemas/CreateTransporterRequestDto')
        )
    )]
    #[OA\Response(
        response: 202,
        description: 'Запрос принят в обработку, результат будет доступен позже'
    )]
    public function __invoke(
        #[MapRequestPayload] CreateTransporterRequestDto $requestDto
    ): JsonResponse {

        return $this->json(null, Response::HTTP_ACCEPTED);
    }
}
