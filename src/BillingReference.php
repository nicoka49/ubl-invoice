<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class BillingReference implements XmlSerializable
{
    private $id;
  
    /**
     * @return string
     */
    public function getId(): ?string
    {
            return $this->id;
    }

    /**
     * @param string $id
     * @return BillingReference
     */
    public function setId(?string $id): BillingReference
    {
        $this->id = $id;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $this->validate();

        $schemeAttributes = [];
        if ($this->schemeID !== null) {
            $schemeAttributes['schemeID'] = $this->schemeID;
        }
        if ($this->schemeName !== null) {
            $schemeAttributes['schemeName'] = $this->schemeName;
        }

        $writer->write([
            'name' => Schema::CBC . 'ID',
            'value' => $this->getId(),
            'attributes' => $schemeAttributes
        ]);

        if ($this->name !== null) {
            $writer->write([
                Schema::CBC . 'Name' => $this->name,
            ]);
        }

        $writer->write([
            Schema::CBC . 'Percent' => number_format($this->percent, 2, '.', ''),
        ]);


        if ($this->taxScheme !== null) {
            $writer->write([Schema::CAC . 'TaxScheme' => $this->taxScheme]);
        } else {
            $writer->write([
                Schema::CAC . 'TaxScheme' => null,
            ]);
        }
    }
}
