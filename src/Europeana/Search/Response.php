<?php

/*
 * This file is part of the Europeana package
 *
 * (c) Matthias Vandermaesen <matthias@colada.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Europeana\Search;

use Europeana\Search\ResponseInterface;
use JMS\Serializer\Annotation\Type;

class Response implements ResponseInterface {

  /**
   * @Type("boolean")
   */
  private $success;

  /**
   * @Type("array")
   */
  private $items;
}
