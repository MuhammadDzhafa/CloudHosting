<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\TLD;
use App\Models\HostingPlan;
use App\Models\RegularMainSpec;

class CheckoutController extends Controller
{
    public function index(Request $request): View
    {
        $tld_name = $request->query('tld_name');
        $tlds = TLD::all();
        $categories = Tld::select('category')->distinct()->get();

        $hostingPlanId = $request->query('hosting_plan_id');
        $specs = [];

        if ($hostingPlanId) {
            // Load hosting plan with its relationships
            $hostingPlan = HostingPlan::with(['prices'])->find($hostingPlanId);
            $regularSpec = RegularMainSpec::where('hosting_plans_id', $hostingPlanId)->first();

            if ($hostingPlan && $regularSpec) {
                // dd($regularSpec); // Uncomment ini untuk debug
                $specs = [
                    ['value' => $regularSpec->storage . ' GB SSD Storage'],
                    ['value' => $regularSpec->RAM . ' RAM'],
                    ['value' => $regularSpec->CPU . ' Core CPU'],
                    ['value' => ($regularSpec->max_domain == -1 ? 'Unlimited' : $regularSpec->max_domain) . ' Domain'],
                    ['value' => ($regularSpec->ssl ? 'Free SSL' : 'SSL')]
                ];

                // Debug data
                // dd([
                //     'hostingPlan' => $hostingPlan,
                //     'regularSpec' => $regularSpec,
                //     'specs' => $specs
                // ]);
            } else {
                // Fallback ke data hosting plan jika regular spec tidak ditemukan
                $specs = [
                    ['value' => $hostingPlan->storage . ' GB SSD Storage'],
                    ['value' => $hostingPlan->RAM . ' RAM'],
                    ['value' => $hostingPlan->CPU . ' Core CPU'],
                    ['value' => ($hostingPlan->max_domain == -1 ? 'Unlimited' : $hostingPlan->max_domain) . ' Domain'],
                    ['value' => ($hostingPlan->ssl ? 'Free SSL' : 'SSL')]
                ];
            }
        }

        // Default specs jika tidak ada data
        if (empty($specs)) {
            $specs = [
                ['value' => '2 GB SSD Storage'],
                ['value' => '2 RAM'],
                ['value' => '1 Core CPU'],
                ['value' => 'Unlimited Domain'],
                ['value' => 'Free SSL']
            ];
        }

        return view('app.hosting-plans.checkout.index', [
            'tld_name' => $tld_name,
            'tlds' => $tlds,
            'categories' => $categories,
            'specs' => $specs,
        ]);
    }
}