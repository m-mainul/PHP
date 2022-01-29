<?php
	require_once 'core/init.php';

	// var_dump(Token::check(Input::get('token')));

	if(Input::exists()) {
		// echo 'Submitted';
		// echo Input::get('username');
		// Even if this token is doesn't exist 
		// This will works fine when chek the token and got the token
		/*<input type = "hidden" name="token" value="<?php echo Token::generate(); ?>"></input>*/
		if(Token::check(Input::get('token'))) {
			// echo 'I have been run';
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username' => array(
					'required' => true,
					'min' => 2,
					'max' => 20,
					'unique' => 'users'
				),
				'password' => array(
					'required' => true,
					'min' => 6
				),
				'password_again' => array(
					'required' => true,
					'matches' => 'password'
				),
				'name' => array(
					'required' => true,
					'min' => 2,
					'max' => 50
				)
			));

			// var_dump($validation); exit;

			if($validation->passed()) {
				// register user
				// echo 'Passed';
				// Session::flash('success', 'You registered successfully!');
				// header('Location: index.php');
				$user = new User();

				 $salt = Hash::salt(32);
				// echo $salt = Hash::salt(32);
				// die();
				
				try {

					$user->create(array(
						'username' => Input::get('username'),
						'password' => Hash::make(Input::get('password'), $salt),
						'salt' => $salt,
						'name' => Input::get('name'),
						'joined' => date('Y-m-d H:i:s'),
						'group' => 1
					));

					Session::flash('home', 'You have been registered and can now log in!');
					// header('Location: index.php');
					// Redirect::to('index.php');
					Redirect::to(404);

				} catch(Exception $e) {
					die($e->getMessage());
				}
			} else {
				// output errors
				foreach ($validation->errors() as $error) {
					echo $error, '<br>';
				}
				// print_r($validation->errors());
			}

		}

	} 
?>
<form action="" method="post">
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"></input>
	</div>

	<div class="field">
		<label for="password">Choose a password</label>
		<input type="password" name="password" id="password"></input>
	</div>

	<div class="field">
		<label for="password_again">Enter your password again</label>
		<input type="password" name="password_again" id="password_again"></input>
	</div>

	<div class="field">
		<label for="name">Your name</label>
		<input type="name" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>"></input>
	</div>
	<input type = "hidden" name="token" value="<?php echo Token::generate(); ?>"></input>
	<input type="submit" value="Register"></input>
</form>