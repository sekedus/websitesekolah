<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Konfigurasi_model;
use App\Models\Client_model;
use App\Models\Akun_model;

class Signin extends BaseController
{

	public function __construct()
	{
		helper('form');
	}

	// Homepage
	public function index()
	{
		$session 		= \Config\Services::session();
		if(isset($_GET['redirect'])) {
			$this->session->set('pengalihan',$_GET['redirect']);
		}
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_siswa 		= new Client_model();
		$konfigurasi 	= $m_konfigurasi->listing();

		// Start validasi
        if($this->request->getMethod() === 'POST' && $this->validate(
            [
            'username'  => 'required|min_length[3]',
            'password'  => 'required|min_length[3]',
            ])) 
        {           
            $username       = $this->request->getPost('username');
            $password       = $this->request->getPost('password');
            $this->simple_login->login_siswa($username,$password);
        }
		// End validasi
		$data = [	'title'			=> 'Login ',
					'description'	=> 'Login Siswa/Calon Siswa '.$konfigurasi->namaweb.', '.$konfigurasi->tentang,
					'keywords'		=> 'Login Siswa/Calon Siswa '.$konfigurasi->namaweb.', '.$konfigurasi->keywords,
					'session'		=> $session,
					'content'		=> 'signin/index'
				];
		echo view('layout/wrapper-pendaftaran',$data);
		// End proses
	}

	// reset
	public function reset()
	{
	    $m_konfigurasi  = new Konfigurasi_model();
	    $m_akun         = new Akun_model();
	    $konfigurasi    = $m_konfigurasi->listing();

	    // Start validasi
	    if ($this->request->getMethod() === 'POST' && $this->validate([
	        'email'  => 'required|valid_email|min_length[3]'
	    ])) {
	        $email  = $this->request->getPost('email');
	        $akun   = $m_akun->email($email);

	        if ($akun) {
	            $token_reset = random_string('alnum', 64);
	            $data = [
	                'id_akun'    => $akun->id_akun,
	                'link_reset' => $token_reset
	            ];
	            $m_akun->edit($data);

	            // Link reset
	            $link_reset = base_url('signin/password/' . $token_reset);
	            $subject    = 'Reset Password - ' . $this->website->namaweb();

	            // Konfigurasi SMTP
	            $email_config = [
	                'protocol'  => $konfigurasi->protocol,
	                'SMTPHost'  => $konfigurasi->smtp_host,
	                'SMTPUser'  => $konfigurasi->smtp_user,
	                'SMTPPass'  => $konfigurasi->smtp_pass,
	                'SMTPPort'  => (int) $konfigurasi->smtp_port,
	                'SMTPTimeout' => (int) $konfigurasi->smtp_timeout,
	                'mailType'  => 'html',
	                'charset'   => 'utf-8',
	                'newline'   => "\r\n"
	            ];

	            // Isi email
	            $message = "<p>Hai <strong>{$akun->nama}</strong>,</p>";
	            $message .= "<p>Kami menerima permintaan untuk mengatur ulang kata sandi Anda.</p>";
	            $message .= "<p>Silakan klik link di bawah ini untuk mengatur ulang kata sandi Anda:</p>";
	            $message .= "<p><a href='{$link_reset}' style='background-color: #28a745; color: #ffffff; padding: 10px 20px; text-decoration: none;'>Reset Password</a></p>";
	            $message .= "<p>Jika Anda tidak meminta pengaturan ulang kata sandi, abaikan email ini.</p>";
	            $message .= "<p>Terima kasih,<br>Tim " . $this->website->namaweb() . "</p>";

	            // Load email library
	            $email_service = \Config\Services::email();
	            $email_service->initialize($email_config);
	            $email_service->setFrom($konfigurasi->smtp_user, $this->website->namaweb());
	            $email_service->setTo($email);
	            $email_service->setSubject($subject);
	            $email_service->setMessage($message);

	            // Kirim email
	            if ($email_service->send()) {
	                $this->session->setFlashdata('sukses', 'Link Reset Telah Dikirimkan ke Email Anda. Silakan klik link tersebut untuk mengganti password.');
	            } else {
	                $this->session->setFlashdata('warning', 'Gagal mengirim email. Silakan coba lagi.');
	            }

	            return redirect()->to(base_url('signin/reset'));
	        } else {
	            $this->session->setFlashdata('warning', 'Mohon maaf, email Anda tidak terdaftar.');
	            return redirect()->to(base_url('signin/reset'));
	        }
	    }

	    // End validasi
	    $data = [
	        'title'       => 'Reset Password',
	        'description' => 'Reset Password ' . $konfigurasi->namaweb . ', ' . $konfigurasi->tentang,
	        'keywords'    => 'Reset Password ' . $konfigurasi->namaweb . ', ' . $konfigurasi->keywords,
	        'content'     => 'signin/reset'
	    ];
	    echo view('layout/wrapper-pendaftaran', $data);
	}


	// Logout
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('signin?logout=sukses'));
	}
}