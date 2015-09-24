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
```pjhp
$this->flasher->set_message('This is test message', 'success', '/other_page_url');
```

3- Get the flash message with styling 
```php
$this->flasher->get_message();
```
It will return an output like this;
```html
<div class="alert alert-success">This is test message</div>
```
4- Get the flash message as an array
```php
$this->flasher->get_all();
```
