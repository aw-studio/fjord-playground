<?php

namespace FjordApp\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;

class LoginComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('script', '/js/login.js');
    }
}
