<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;

class AdminSubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::where('status',1)->get();
        return view('admin.subscriber.index', compact('subscribers'));
    }

    public function send_message()
    {
        return view('admin.subscriber.send_message');
    }

    public function send_message_submit(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
        ], [
            'subject.required' => __('Subject is required'),
            'content.required' => __('Content is required'),
        ]);

        $subscribers = Subscriber::where('status',1)->get();

        $subject = $request->subject;
        $message = $request->content;

        foreach($subscribers as $subscriber){
            \Mail::to($subscriber->email)->send(new Websitemail($subject,$message));
        }

        return redirect()->back()->with('success', __('Message sent successfully'));
    }

    public function delete($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
