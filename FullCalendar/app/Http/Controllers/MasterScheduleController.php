<?php

namespace App\Http\Controllers;

use App\Models\MasterSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MasterScheduleController extends Controller
{
    public function index()
    {
				$masterSchedules = MasterSchedule::with(['homeTeam', 'awayTeam'])->get();

				foreach ($masterSchedules as $masterSchedule) {
						// if ($masterSchedule->title === null) {
						// 		$masterSchedule->title = $masterSchedule->homeTeam->name . ' vs ' . $masterSchedule->awayTeam->name;
						// }
						$masterSchedule->title = $masterSchedule->title . ' '. $masterSchedule->homeTeam->name . ' vs ' . $masterSchedule->awayTeam->name;
						$startDateTime = Carbon::parse($masterSchedule->date . ' ' . $masterSchedule->time);
						$masterSchedule->start = $startDateTime->toDateTimeString();	
				}

        return response()->json($masterSchedules);
    }

    public function show($id)
    {
        $masterSchedule = MasterSchedule::findOrFail($id);
        return response()->json($masterSchedule);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'location' => 'nullable|string',
            'sub_location' => 'nullable|string',
        ]);

        $masterSchedule = MasterSchedule::create($data);
        return response()->json($masterSchedule, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'location' => 'nullable|string',
            'sub_location' => 'nullable|string',
        ]);

        $masterSchedule = MasterSchedule::findOrFail($id);
        $masterSchedule->update($data);

        return response()->json($masterSchedule);
    }

    public function destroy($id)
    {
        $masterSchedule = MasterSchedule::findOrFail($id);
        $masterSchedule->delete();

        return response()->json(null, 204);
    }
}

