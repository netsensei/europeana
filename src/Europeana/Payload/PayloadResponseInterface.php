<?php

/*
 * This file is part of the Europeana API package.
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Payload;

/**
 * @author Matthias Vandermaesen <matthias@colada.be>
 */
interface PayloadResponseInterface
{
    /**
     * @return bool True if the request was handled successfully, false otherwise
     */
    public function isOk();

    /**
     * @return string|null Any error message returned by Europeana (always null if response was 'ok')
     */
    public function getError();

    /**
     * @return string|null Any error message returned by Europeana, converted into a more human-readable sentence
     *                     (always null if response was 'ok')
     */
    public function getErrorExplanation();
}
