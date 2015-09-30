# Codeigniter Flasher Library
A simple Codeigniter flash messaging library. Compatible only with bootstrap.

## Usage
1- Load the library
```php
$this->load->library('flasher');
```
2- Set the flash message
```php
$this->flasher->set_message('This is test message', 'success');
```
If you want to redirect another page pass the url as third parameter;
```php
$this->flasher->set_message('This is test message', 'success', '/other_page_url');
```
3- Set the flash message by notification type
```php
$this->flasher->set_success('This is success.');
$this->flasher->set_info('This is info.');
$this->flasher->set_warning('This is warning');
$this->flasher->set_danger('This is danger');
```
4- Get the flash message with styling 
```php
$this->flasher->get_message();
```
It will return an output like this;
```html
<div class="alert alert-success">This is test message</div>
```
5- Get the flash message as an array
```php
$this->flasher->get_all();
```
