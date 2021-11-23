# todo list

## Installation

> Note:
> You must have PHP v7.4.0+, git and composer installed.
1. Clone the repo `git clone https://gitlab.com/mehrabani.developer/todo-list-api.git`
2. Copy the `.env.exapmle` to `.env`.
3. Run `composer install`
4. Run `php artisan key:generate`
5. Run `vendor/bin/sail up -d`
6. Run `vendor/bin/sail artisan migrate`
7. Run `vendor/bin/sail artisan jwt:secret`
8. Run `vendor/bin/sail artisan schedule:work`

## Api Document Link
[postman document Link](https://documenter.getpostman.com/view/5490647/UVJYKecp)
