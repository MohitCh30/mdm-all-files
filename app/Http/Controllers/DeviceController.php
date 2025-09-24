<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\LockHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeviceController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'device_id' => 'required|unique:devices',
            'user_name' => 'required',
            'location' => 'required',
        ]);

        $device = Device::create($validated);

        return response()->json([
            'message' => 'Device registered',
            'device' => $device
        ], 201);
    }

    public function lock($device_id, Request $request)
    {
        $device = Device::where('device_id', $device_id)->firstOrFail();
        $device->update(['status' => 'locked']);

        Http::post('https://external-api.com/lock', [
            'device_id' => $device->device_id,
            'timestamp' => now(),
        ]);

        LockHistory::create([
            'device_id' => $device->id,
            'action' => 'lock',
            'reason' => $request->input('reason', 'No reason provided'),
            'performed_by' => 'system',
        ]);

        return response()->json(['message' => 'Device locked']);
    }

    public function unlock($device_id, Request $request)
    {
        $device = Device::where('device_id', $device_id)->firstOrFail();
        $device->update(['status' => 'unlocked']);

        LockHistory::create([
            'device_id' => $device->id,
            'action' => 'unlock',
            'performed_by' => $request->user()->name ?? 'authenticated_user',
        ]);

        return response()->json(['message' => 'Device unlocked']);
    }
}
