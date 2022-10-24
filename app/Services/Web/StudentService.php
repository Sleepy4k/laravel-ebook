<?php

namespace App\Services\Web;

use App\Services\Service;

class StudentService extends Service
{
    /**
     * Index function.
     * 
     * @param $path
     */
    public function index()
    {
        return [];
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function create()
    {
        return [
            'students' => $this->siswaInterface->all()
        ];
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        if (array_key_exists('kelas_tipe', $request) && array_key_exists('kelas_jurusan', $request) && array_key_exists('kelas_nomer', $request)) {
            $request['kelas'] = $request['kelas_tipe'] . ' ' . $request['kelas_jurusan'] . ' ' . $request['kelas_nomer'];

            unset($request['kelas_tipe']);
            unset($request['kelas_jurusan']);
            unset($request['kelas_nomer']);
        } else {
            return toastr()->error('Data gagal dibuat', 'System');
        }

        $this->siswaInterface->create($request);
 
        return toastr()->success('Data berhasil dibuat', 'System');
    }

    /**
     * Show function.
     * 
     * @param $path
     * @param $id
     */
    public function show($id)
    {
        return [
            'student' => $this->siswaInterface->findById($id)
        ];
    }

    /**
     * Edit function.
     * 
     * @param $path
     * @param $id
     */
    public function edit($id)
    {
        return [
            'student' => $this->siswaInterface->findById($id)
        ];
    }

    /**
     * Update function.
     * 
     * @param $request
     * @param $id
     */
    public function update($request, $id)
    {
        $this->siswaInterface->update($id, $request);

        return toastr()->success('Data berhasil diubah', 'System');
    }
    
    /**
     * Destroy function.
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $this->siswaInterface->deleteById($id);

        return toastr()->success('Data berhasil dihapus', 'System');
    }
}