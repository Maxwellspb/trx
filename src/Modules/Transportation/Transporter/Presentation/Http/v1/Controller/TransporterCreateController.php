<?php

namespace App\Modules\Transportation\Transporter\Presentation\Http\v1\Controller;

use App\Modules\Transportation\Transporter\Presentation\Http\v1\Request\CreateTransporterRequestDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;

#[Route('/api/v1/transporters', methods: ['POST'])]

class TransporterCreateController extends AbstractController
{
    #[OA\Response(
        response: 200,
        description: 'Transporter successfully created',
    )]
    public function __invoke(
        #[MapRequestPayload] CreateTransporterRequestDto $requestDto
    ): JsonResponse {

        return $this->json([]);
    }
}
