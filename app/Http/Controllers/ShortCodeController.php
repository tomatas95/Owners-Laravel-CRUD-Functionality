<?  

namespace App\Http\Controllers;

use App\Models\ShortCode;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shortCodes = ShortCode::all();

        return response()->json([
            'shortCodes' => $shortCodes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortCode $shortCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortCode $shortCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShortCode $shortCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortCode $shortCode)
    {
        //
    }
}
