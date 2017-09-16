<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
final class DashboardController extends Controller
{
    public function indexAction()
    {
        $params = [
            'user' => Auth::user()
        ];
        return view('vendor.backpack.base.dashboard', $params);
    }
}
