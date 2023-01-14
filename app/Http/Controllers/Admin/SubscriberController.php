<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubscriberDataTable;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends BaseController
{
    /**
     * @param SubscriberDataTable $dataTable
     * @return mixed
     */
    public function index(SubscriberDataTable $dataTable)
    {
        return $dataTable->render('admin.subscribers.index');
    }


    public function store(SubscriberRequest $request)
    {
        $subscriber = Subscriber::newSubscriber($request);
        return self::getJsonResponse('', $subscriber);
    }


    public function show(Subscriber $subscriber)
    {
        return self::getJsonResponse('', $subscriber);
    }

    public function update(SubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->updateSubscriber($request);
        return self::getJsonResponse('', $subscriber);
    }


    public function destroy(Request $request)
    {
        $subscriber = Subscriber::findOrFail($request->id);
        $subscriber->delete();
        return self::getJsonResponse('', []);
    }
}
