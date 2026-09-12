<?php

namespace App\Modules\Transportation\Transporter\Infrastructure\Delivery\Api\v1\Controller;

use App\Modules\Company\Infrastructure\Delivery\Api\v1\Request\CreateCompanyRequestDto;
use App\Modules\Company\Infrastructure\Delivery\Api\v1\Response\CompanyResponseDto;
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
        response: 201,
        description: 'Перевозчик успешно создан',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(ref: '#/components/schemas/TransporterResponseDto')
        )
    )]
    public function __invoke(
        #[MapRequestPayload] CreateCompanyRequestDto $requestDto
    ): JsonResponse {

        $responseDto = new CompanyResponseDto(
            id: '550e8400-e29b-41d4-a716-446655440000',
            orgName: $requestDto->orgName,
            shortName: $requestDto->shortName,
            orgAddress: $requestDto->orgAddress,
            inn: $requestDto->inn,
            kpp: $requestDto->kpp,
            ogrn: $requestDto->ogrn,
        );

        $response = $this
            ->serializer
            ->normalize($responseDto, );

        return $this
            ->json($response, Response::HTTP_CREATED);
    }
}
