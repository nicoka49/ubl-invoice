<?php

namespace NumNum\UBL;

class CreditNote extends Invoice
{
    public $xmlTagName = 'CreditNote';
    protected $invoiceTypeCode = InvoiceTypeCode::CREDIT_NOTE;
    protected $billingReference;
    /**
     * @return CreditNoteLine[]
     */
    public function getCreditNoteLines(): ?array
    {
        return $this->invoiceLines;
    }

    /**
     * @param CreditNoteLine[] $creditNoteLines
     * @return CreditNote
     */
    public function setCreditNoteLines(array $creditNoteLines): CreditNote
    {
        $this->invoiceLines = $creditNoteLines;
        return $this;
    }

    
    /**
     * @param CreditNoteLine[] $creditNoteLines
     * @return CreditNote
     */
    public function setBillingReference(array $billingReference): CreditNote
    {
        $this->billingReference = $creditNoteLines;
        return $this;
    }
}
