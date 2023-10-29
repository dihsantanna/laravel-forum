<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\{
    CreateSupportDTO,
    UpdateSupportDTO
};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(protected SupportService $service)
    {
    }

    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            perPage: $request->get('per_page', 5),
            filter: $request->filter
        );

        $filters = [
            'filter' => $request->get('filter', ''),
        ];

        return view('admin.supports.index', compact('supports', 'filters'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupportRequest $request)
    {

        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()
            ->route('supports.index')
            ->with('message', 'Dúvida cadastrada com sucesso!');
    }

    public function show(string|int $id)
    {
        $support = $this->service->findOne($id);

        if (!$support) return back();

        return view('admin.supports.show', compact('support'));
    }

    public function edit(Support $support, string|int $id)
    {
        $support = $this->service->findOne($id);

        if (!$support) return back();

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if (!$support) return back();

        return redirect()
            ->route('supports.index')
            ->with('message', 'Dúvida alterada com sucesso!');
    }

    public function destroy(string|int $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index')
            ->with('message', 'Dúvida excluída com sucesso!');
    }
}
