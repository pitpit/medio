<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Medio\Model;

use Gnugat\Medio\ValueObject\FullyQualifiedName;

/**
 * @api
 */
class File
{
    /**
     * @var string
     */
    private $filename;

    /**
     * @var FullyQualifiedName
     */
    private $fullyQualifiedName;

    /**
     * @var array
     */
    private $imports = array();

    /**
     * @param string    $filename
     * @param Structure $structure
     *
     * @api
     */
    public function __construct($filename, Structure $structure)
    {
        $this->filename = $filename;
        $this->fullyQualifiedName = new FullyQualifiedName($structure->getNamespace());
        $this->structure = $structure;
    }

    /**
     * @param string    $filename
     * @param Structure $structure
     *
     * @return File
     *
     * @api
     */
    public static function make($filename, Structure $structure)
    {
        return new self($filename, $structure);
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->fullyQualifiedName->getNamespace();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->fullyQualifiedName->getName();
    }

    /**
     * @return array
     */
    public function allImports()
    {
        return $this->imports;
    }

    /**
     * @param Import $import
     *
     * @return File
     *
     * @api
     */
    public function addImport(Import $import)
    {
        $this->imports[] = $import;

        return $this;
    }

    /**
     * @return Structure
     */
    public function getStructure()
    {
        return $this->structure;
    }
}
