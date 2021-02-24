<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Compras;

class DashboardController extends Controller
{

	public function __invoke() {
	        $weekData  = $this->getData(6);
	        $monthData = $this->getData(29);

	        $comparison = $this->getComparisonStatistics(29);

	        $orders = Compras::orderBy('transaction_date','desc')
	                          ->select('extra1', 'state_pol', 'reference_sale')
	                          ->take(5)->get();
	        $amounts    = $this->getAmount();

	        $countState = $this->getCountState();

	        return view('admin.ecommerce.dashboard', compact('orders','weekData', 'monthData', 'comparison', 'amounts','countState'));
	}

    private function getData($days) {
        $today     = Carbon::today();
        $count     = 0;
        $maxAmount = 0;

        for ($i = $days; $i >= 0; $i--) {
            $day = $today->copy()->subDays($i);
            $orders = Compras::where('transaction_date', $day);

            $amount     = $orders->where('state_pol',4)->sum('value');
            $totalItems = $orders->where('state_pol',4)->sum('extra1');
            $count += $orders->count();

            $maxAmount    = ($amount > $maxAmount) ?  $amount : $maxAmount;
            $data['data'][] = [$day->year, $day->month, $day->day, $orders->count(), $amount, $totalItems];
        }

        $data['maxAmount'] = $maxAmount + ($maxAmount / 5);
        $data['count'] = $count;
        return $data;

    }
    private function getComparisonStatistics($days) {
        $today = Carbon::today();
        $currentOrders = Compras::whereBetween('transaction_date',[ $today->copy()->subDays($days), $today])
                        ->orderBy('transaction_date')->get();

        $data['current'] = (object)[
            //total ordenes exitosas
            'toe' => $currentOrders->where('state_pol', 4)->count(),
            //total ordnes
            'to'  => $currentOrders->count(),
            //total monto
            'tm'  => $currentOrders->where('state_pol', 4)->sum('value'),
        ];

        $pastOrders = Compras::whereBetween('transaction_date',[ $today->copy()->subDays(($days * 2)),
                                                                 $today->copy()->subDays($days)])
                        ->orderBy('transaction_date')->get();
        $data['past'] = (object)[
            'toe' => $pastOrders->where('state_pol', 4)->count(),
            'to'  => $pastOrders->count(),
            'tm'  => $pastOrders->where('state_pol', 4)->sum('value'),
        ];

        $data['toe_diff'] = $this->calculateDiff($data['current']->toe, $data['past']->toe);
        $data['to_diff']  = $this->calculateDiff($data['current']->to,  $data['past']->to);
        $data['tm_diff']  = $this->calculateDiff($data['current']->tm,  $data['past']->tm);

        return (object)$data;
    }
    private function calculateDiff($valC, $valP)
    {
        if ($valP > 0)
            return  ( ($valC / $valP) - 1 ) * 100;
        else
           return  $valC;
    }

    private function getAmount()
    {
        $today = Carbon::today();

        $data['weekly'] = Compras::whereBetween('transaction_date', [$today->copy()->subDays(7), $today])
                                   ->where('state_pol',4)
                                   ->sum('value');
        $data['monthly'] = Compras::whereBetween('transaction_date', [$today->copy()->subDays(30), $today])
                                   ->where('state_pol',4)
                                   ->sum('value');
        $data['totaly'] = Compras::where('state_pol',4)
                                   ->sum('value');

        return (object)$data;
    }

    private function getCountState()
    {

        $data['approved'] = Compras::where('state_pol',4)->count();
        $data['declined'] = Compras::where('state_pol',6)->count();
        $data['expired']  = Compras::where('state_pol',5)->count();
        $data['total']    = Compras::get()->count();

        return (object)$data;
    }

}
