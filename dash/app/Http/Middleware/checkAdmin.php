<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // تحقق مما إذا كان المستخدم غير مسجل أو ليس له صلاحية دخول
        if (!$user || ($user->type !== 'admin' && $user->type !== 'superAdmin')) {
            // توجيه المستخدمين غير المخولين إلى صفحة الهبوط
            return redirect()->route('landingpags.index')->with('error', 'You do not have access to the dashboard.');
        }

        // إذا كان المستخدم Admin أو Super Admin، يتم السماح له بالمرور إلى الطلب التالي
        return $next($request);
    }
}
