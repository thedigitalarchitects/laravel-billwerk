<?php

namespace Tda\LaravelBillwerk\Trait;


trait Endpoints
{
    public function AccountingExportFiles(?string $id = null)
    {
        $this->endpoint = 'accountingexportfiles' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function annulate()
    {
        $this->endpoint .= '/annulate';
        return $this;
    }

    public function approve()
    {
        $this->endpoint .= '/approve';
        return $this;
    }

    public function bill()
    {
        $this->endpoint .= '/bill';
        return $this;
    }

    public function cancellationPreview()
    {
        $this->endpoint .= '/cancellationpreview';
        return $this;
    }

    public function changes(?string $id = null)
    {
        preg_match('/contracts\/(?<id>\w*)/', $this->endpoint, $match);
        if(isset($match['id'])) {
            $this->params = [
                'contractId' => $match['id']
            ];
        }
        $this->endpoint = '/contractchanges'  . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function contracts(?string $id = null)
    {
        preg_match('/customers\/(?<id>\w*)/', $this->endpoint, $match);
        if(isset($match['id'])) {
            $this->endpoint .= '/contracts';
        } else {
            $this->endpoint = 'contracts' . (isset($id) ? '/' . $id : '');
        }
        return $this;
    }

    public function commit()
    {
        $this->endpoint .= '/commit';
        return $this;
    }

    public function componentSubscriptions(?string $id = null)
    {
        if($id) {
            $this->endpoint = 'componentsubscriptions/'. $id . '/replace';
        } else {
            $this->endpoint .= '/componentsubscriptions';
        }
        return $this;
    }

    public function customers(?string $id = null)
    {
        $this->endpoint = 'customers' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function customFields()
    {
        $this->endpoint .= '/customfields';
        return $this;
    }

    public function decline()
    {
        $this->endpoint .= '/decline';
        return $this;
    }

    public function discounts(string $id)
    {
        $this->endpoint = 'discounts' . '/' . $id;
        return $this;
    }

    public function discountSubscriptions()
    {
        $this->endpoint .= '/discountsubscriptions';
        return $this;
    }

    public function download()
    {
        $this->endpoint .= '/download';
        return $this;
    }

    public function downloadLink()
    {
        $this->endpoint .= '/downloadlink';
        return $this;
    }

    public function end()
    {
        $this->endpoint .= '/end';
        return $this;
    }

    public function invoices(?string $id = null)
    {
        $this->endpoint = 'invoices' . '/' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function invoiceDrafts(?string $id = null)
    {
        $this->endpoint = 'invoicedrafs' . '/' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function orders(?string $id = null)
    {
        $this->endpoint = 'orders' . '/' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function payment()
    {
        $this->endpoint .= '/payment';
        return $this;
    }

    public function paymentTransactions()
    {
        $this->endpoint = 'paymenttransactions';
        return $this;
    }

    public function plans(?string $id = null)
    {
        $this->endpoint = 'plans' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function planGroups(?string $id = null): self
    {
        $this->endpoint = 'plangroups' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function planVariants(?string $id = null): self
    {
        $this->endpoint = 'planvariants' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function preview()
    {
        $this->endpoint .= '/preview';
        return $this;
    }

    public function previewNextRecurring()
    {
        $this->endpoint .= '/previewnextrecurring';
        return $this;
    }

    public function priceLists(?string $id = null)
    {
        $this->endpoint = 'pricelists' . '/' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function productInfo()
    {
        $this->endpoint = 'productinfo';
        return $this;
    }

    public function ratedItems()
    {
        $this->endpoint .= '/rateditems';
        return $this;
    }

    public function selfServiceToken()
    {
        $this->endpoint .= '/selfservicetoken';
        return $this;
    }

    public function subscriptions()
    {
        preg_match('/contracts\/(?<id>\w*)/', $this->endpoint, $match);
        if(isset($match['id'])) {
            $this->endpoint .= '/subscriptions';
        } else {
            $this->endpoint = 'subscriptions';
        }
        return $this;
    }

    public function usage(?string $id = null)
    {
        $this->endpoint .= '/usage' . (isset($id) ? '/' . $id : '');
        return $this;
    }

    public function webhooks(?string $id = null)
    {
        $this->endpoint = 'webhooks' . (isset($id) ? '/' . $id : '');
        return $this;
    }
}
