<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
final class DashboardController extends Controller
{
    public function indexAction()
    {
        return view('vendor.backpack.base.dashboard');
    }
}
