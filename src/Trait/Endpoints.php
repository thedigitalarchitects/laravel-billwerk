<?php

namespace Tda\LaravelBillwerk\Trait;


trait Endpoints
{
    public static function AccountingExportFiles(?string $id = null)
    {
        self::$endpoint = 'accountingexportfiles' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function annulate()
    {
        self::$endpoint .= '/annulate';
        return new Static();
    }

    public static function approve()
    {
        self::$endpoint .= '/approve';
        return new Static();
    }

    public static function bill()
    {
        self::$endpoint .= '/bill';
        return new Static();
    }

    public static function cancellationPreview()
    {
        self::$endpoint .= '/cancellationpreview';
        return new Static();
    }

    public static function changes(?string $id = null)
    {
        preg_match('/contracts\/(?<id>\w*)/', self::$endpoint, $match);
        if(isset($match['id'])) {
            self::$params = [
                'contractId' => $match['id']
            ];
        }
        self::$endpoint = '/contractchanges'  . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function contracts(?string $id = null)
    {
        preg_match('/customers\/(?<id>\w*)/', self::$endpoint, $match);
        if(isset($match['id'])) {
            self::$endpoint .= '/contracts';
        } else {
            self::$endpoint = 'contracts' . (isset($id) ? '/' . $id : '');
        }
        return new Static();
    }

    public static function commit()
    {
        self::$endpoint .= '/commit';
        return new Static();
    }

    public static function componentSubscriptions(?string $id = null)
    {
        if($id) {
            self::$endpoint = 'componentsubscriptions/'. $id . '/replace';
        } else {
            self::$endpoint .= '/componentsubscriptions';
        }
        return new Static();
    }

    public static function customers(?string $id = null)
    {
        self::$endpoint = 'customers' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function customFields()
    {
        self::$endpoint .= '/customfields';
        return new Static();
    }

    public static function decline()
    {
        self::$endpoint .= '/decline';
        return new Static();
    }

    public static function discounts(string $id)
    {
        self::$endpoint = 'discounts' . '/' . $id;
        return new Static();
    }

    public static function discountSubscriptions()
    {
        self::$endpoint .= '/discountsubscriptions';
        return new Static();
    }

    public static function download()
    {
        self::$endpoint .= '/download';
        return new Static();
    }

    public static function downloadLink()
    {
        self::$endpoint .= '/downloadlink';
        return new Static();
    }

    public static function end()
    {
        self::$endpoint .= '/end';
        return new Static();
    }

    public static function invoices(?string $id = null)
    {
        self::$endpoint = 'invoices' . '/' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function invoiceDrafts(?string $id = null)
    {
        self::$endpoint = 'invoicedrafs' . '/' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function orders(?string $id = null)
    {
        self::$endpoint = 'orders' . '/' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function payment()
    {
        self::$endpoint .= '/payment';
        return new Static();
    }

    public static function paymentTransactions()
    {
        self::$endpoint = 'paymenttransactions';
        return new Static();
    }

    public static function plans(?string $id = null)
    {
        self::$endpoint = 'plans' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function planGroups(?string $id = null): self
    {
        self::$endpoint = 'plangroups' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function planVariants(?string $id = null): self
    {
        self::$endpoint = 'planvariants' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function preview()
    {
        self::$endpoint .= '/preview';
        return new Static();
    }

    public static function previewNextRecurring()
    {
        self::$endpoint .= '/previewnextrecurring';
        return new Static();
    }

    public static function priceLists(?string $id = null)
    {
        self::$endpoint = 'pricelists' . '/' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function productInfo()
    {
        self::$endpoint = 'productinfo';
        return new Static();
    }

    public static function ratedItems()
    {
        self::$endpoint .= '/rateditems';
        return new Static();
    }

    public static function selfServiceToken()
    {
        self::$endpoint .= '/selfservicetoken';
        return new Static();
    }

    public static function subscriptions()
    {
        preg_match('/contracts\/(?<id>\w*)/', self::$endpoint, $match);
        if(isset($match['id'])) {
            self::$endpoint .= '/subscriptions';
        } else {
            self::$endpoint = 'subscriptions';
        }
        return new Static();
    }

    public static function usage(?string $id = null)
    {
        self::$endpoint .= '/usage' . (isset($id) ? '/' . $id : '');
        return new Static();
    }

    public static function webhooks(?string $id = null)
    {
        self::$endpoint = 'webhooks' . (isset($id) ? '/' . $id : '');
        return new Static();
    }
}
