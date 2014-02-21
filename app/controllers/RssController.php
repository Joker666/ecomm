<?php

class RssController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['products'] = Product::orderBy('created_at', 'desc')->limit(10)->get();
        return Response::view('rss', $data, 200, [
            'Content-Type' => 'application/atom/xml; charset=UTF-8'
        ]);
	}
}
