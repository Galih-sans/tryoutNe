<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class checkRole implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public $role_model;
    public $encrypter;

    public function before(RequestInterface $request, $arguments = null)
    {
        $this->role_model = new \App\Models\Admin\RoleModel();
        $this->encrypter = \Config\Services::encrypter();
        // if (!session()->get('isAdmin')) {
        //     return view('errors/html/error_403');
        //     // return redirect()->to(site_url('login'));
        // }
        if ($request->getUri()->getSegment(2)) {
            $nextRequest = "ha_" . str_replace('-', '_', $request->getUri()->getSegment(2));

            // user role_id
            $id_role = $this->encrypter->decrypt(base64_decode(session()->get('role')));
            // $id_role = session()->get('role');
            $akses = $this->role_model->where('id', $id_role)->where('id', $id_role)->findAll();
            $check = $akses[0]->$nextRequest;

            if (!$check) {
                // print_r($akses[0]->$nextRequest);
                echo view('errors/html/error_403');
                exit;
            }
        }
    }
    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
