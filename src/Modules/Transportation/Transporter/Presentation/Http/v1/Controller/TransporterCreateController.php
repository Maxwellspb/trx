<?php

namespace App\Modules\Transportation\Transporter\Presentation\Http\v1\Controller;

use App\Modules\Transportation\Transporter\Presentation\Http\v1\Request\CreateTransporterRequestDto;
use App\Modules\Transportation\Transporter\Presentation\Http\v1\Response\TransporterResponseDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\SerializerInterface;

#[Route(path: '/api/v1/transporters', name:'api:v1:transporters_create', methods: ['POST'])]
class TransporterCreateController extends AbstractController
{
    public function __construct(
        private SerializerInterface $serializer,
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
        #[MapRequestPayload] CreateTransporterRequestDto $requestDto
    ): JsonResponse {

        $responseDto = new TransporterResponseDto(
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
