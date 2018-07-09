<?php

/*
 * This file is part of the Panthère project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Symfony\Component\Panthere\DomCrawler\Field;

use Facebook\WebDriver\WebDriverElement;
use Symfony\Component\Panthere\ExceptionThrower;

/**
 * @internal
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
trait FormFieldTrait
{
    use ExceptionThrower;

    private $element;

    public function __construct(WebDriverElement $element)
    {
        $this->element = $element;
        $this->initialize();
    }

    public function getLabel()
    {
        $this->throwNotSupported(__METHOD__);
    }

    public function getName()
    {
        return $this->element->getAttribute('name');
    }

    public function getValue()
    {
        return $this->element->getAttribute('value');
    }

    public function setValue($value)
    {
        \is_bool($value) ? $this->element->click() : $this->element->sendKeys($value);
    }

    public function isDisabled()
    {
        return $this->element->getAttribute('disabled') ?? false;
    }
}
