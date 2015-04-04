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
abstract class AbstractPayload implements PayloadInterface
{
    private $args = array();

    /**
     * {@inheritdoc}
     */
    public function getResponseClass()
    {
        return sprintf('%sResponse', get_class($this));
    }

    public function getArguments()
    {
        return $this->args;
    }

    private function argumentExists($key)
    {
        foreach ($this->args as $arg) {
            if (isset($arg[$key])) {
                return true;
            }
        }

        return false;
    }

    public function getArgument($key)
    {
        foreach ($this->args as $arg) {
            if (isset($arg[$key])) {
                return $arg[$key];
            }
        }

        return false;
    }

    public function setArgument($key, $value, $multiple = false)
    {
        if ($multiple) {
            $this->args[] = array($key, $value);
        } else {
            try {
                if ($this->argumentExists('query')) {
                    new \InvalidArgumentException(sprintf(
                            'Argument "%s" was already set with value "%s".',
                            $key,
                            $value
                        ));
                }
                $this->args[] = array($key, $value);
            } catch (\Exception $e) {
                throw new EuropeanaException('Failed to set invalid argument', null, $e);
            }
        }
    }
}
