<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Http\Resources\Contract\ContractResource;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ContractController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Contract/Index', [
            'contracts' => Contract::all(),
        ]);
    }

    /**
     * @return mixed
     */
    public function create(): mixed
    {
        return $this->form( null);
    }

    /**
     * @param Contract $contract
     * @return mixed
     */
    public function edit(Contract $contract): mixed
    {
        return $this->form($contract);
    }

    /**
     * @param Contract|null $contract
     * @return Response
     */
    public function form(Contract $contract = null): Response
    {
        $tmpData = [];
        foreach (User::all('id', 'username') as $param){
            $tmpData[$param['id']] = $param['username'];
        }
        if ($contract == null) $contract = new Contract();
        return Inertia::render('Contract/Form', [
            'contract' => new ContractResource($contract),
            'users' => $tmpData
        ]);
    }

    /**
     * @param ContractRequest $request
     * @return RedirectResponse
     */
    public function store(ContractRequest $request): RedirectResponse
    {
        Contract::saveContract($request->validated());
        return redirect()->route('contracts.index')->with('success', 'Le contrat a bien été créé');
    }

    /**
     * @param ContractRequest $request
     * @param Contract|null $contract
     * @return RedirectResponse
     */
    public function update(ContractRequest $request, Contract $contract = null): RedirectResponse
    {
        Contract::saveContract($request->validated(), $contract);
        return Redirect::route('contracts.index')->with('success', 'Le contract a bien été mis à jour');
    }

    /**
     * @param Contract $contract
     * @return RedirectResponse
     */
    public function destroy(Contract $contract): RedirectResponse
    {
        $contract->delete();
        return Redirect::route('contracts.index')->with('success', 'Le contrat a bien été supprimé');
    }
}
