<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesInformationRequest;
use App\Models\SaleInformation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalesInformationController extends Controller
{

    public function listing(): View
    {
        $sales = SaleInformation::orderBy('created_at', 'desc')
                                        ->paginate(15);
        return view($this->viewPath().'index', [
            'sales' => $sales
        ]);
    }
    /**
     * redirect user to the adding sales information
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view($this->viewPath().'action.random');
    }
    /**
     * Store information given by user when he go to the creation view
     * @param \App\Http\Requests\SalesInformationRequest $salesInformationRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SalesInformationRequest $salesInformationRequest): RedirectResponse
    {
        try {
            $data = $salesInformationRequest->validated();
            $sales = SaleInformation::create($data);
            return redirect()->route($this->routes().'listing')->with('success', 'successful addition of information');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'create')->with('error', 'Oops, there was a mistake'.$e->getMessage());
        }
    }

    /**
     * When user need to edit salesInformation given
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $sales = SaleInformation::findOrFail($id);
        return view($this->viewPath().'action.random', [
            'sales' => $sales
        ]);
    }

    /**
     * update the new information given by users
     * @param string $id
     * @param \App\Http\Requests\SalesInformationRequest $salesInformationRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $id, SalesInformationRequest $salesInformationRequest): RedirectResponse
    {
        try {
            $data = $salesInformationRequest->validated();
            $sales = SaleInformation::findOrFail($id);
            $sales->update($data);
            return redirect()->route($this->routes().'edit',['id' => $sales->id])->with('success', 'successful addition of information');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'edit',['id' => $sales->id])->with('error', 'Oops, there was a mistake'.$e->getMessage());
        }
    }

    /**
     * Deleting a Sales information given
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(string $id): RedirectResponse
    {
        $sales = SaleInformation::findOrFail($id);
        $sales->delete();
        return redirect()->route($this->routes().'listing')->with('success', 'Deletion of information successful');
    }
    /**
     * Routes directory
     * @return string
     */
    private function routes(): string
    {
        $routes = "Admin.Sales.";
        return $routes;
    }
    /**
     * View directory
     * @return string
     */
    private function viewPath(): string
    {
        $view = "admin.sales.";
        return $view;
    }
}
