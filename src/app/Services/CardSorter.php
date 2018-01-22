<?php

namespace app\Services;

use app\Exceptions\InvalidArgumentException;
use app\Exceptions\NonSortableBoardingCardsException;


/**
 * Class CardSorter
 * @package app\Services
 */
class CardSorter
{
    /**
     * @param array $boardingCards
     * @return array
     * @throws InvalidArgumentException
     * @throws NonSortableBoardingCardsException
     */
    public function sort(array $boardingCards): array
    {
        if (empty($boardingCards)) {
            throw new InvalidArgumentException('No boarding cards to sort.');
        }

        $input = $boardingCards;
        $sortedCards = [array_pop($boardingCards)];

        while (0 < $countInput = count($input)) {
            foreach ($input as $key => $card) {
                if (end($sortedCards)->hasSameDestinationAs($card)) {
                    $sortedCards[] = $card;

                    unset($input[$key]);
                } elseif (reset($sortedCards)->hasSameOriginAs($card)) {
                    array_unshift($sortedCards, $card);

                    unset($input[$key]);
                }

                if (1 === count($input)) {
                    unset($input[$key]);
                }
            }

            if (count($input) === $countInput) {
                throw new NonSortableBoardingCardsException(
                    'Impossible to sort boarding cards'
                );
            }
        }

        return $sortedCards;
    }
}
