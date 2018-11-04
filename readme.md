#소스파일 확인을 위한 Laravel 개발환경 구축

우선 laravel을 사용하기 위해서는 컴퓨터 및 서버에 다음과 같은 패키지들이 설치되어 있어야 합니다.

7.1.3 버전 이상의 [PHP](http://web-front-end.tistory.com/32)
OpenSSL PHP 확장 패키지
PDO PHP 확장 패키지
Mbstring PHP 확장 패키지
Tokenizer PHP 확장 패키지
XML PHP 확장 패키지
Ctype PHP 확장 패키지
Json PHP 확장 패키지
Mysql 로컬 서버

추가적으로 의존성 관리도구로 [composer](https://getcomposer.org/)와 [npm](https://nodejs.org/ko/) 또한 설치되어있어야 합니다.

또한 터미널 환경에서 Composer를 사용해 라라벨을 다운받고 프로젝트 생성을 하는데,
윈도우 8.1버전 이하에서는 git bash를 사용하는것이 권장됩니다.

위 링크를 통해 기본적인 프로그램 설치가 완료되었다면,

터미널창에서
~~~
composer global require “laravel/installer”
~~~
해당 명령어를 입력하고 라라벨 인스톨러를 설치하여 laravel 명령을 사용가능하도록 세팅합니다.

이제 현재 repository를 git clone 하여 적당한 디렉토리에 다운로드 받습니다.
다운받은 디렉토리를 터미널 창으로 접근하면 의존성 관리 파일인 composer.json이 위치한 프로젝트 최상위 폴더에서
~~~
composer install
~~~
명령을 통해 필요한 패키지들을 설치합니다.
설치가 완료되면
~~~
php artisan serve --port=8080
~~~
위 명령어를 입력해주어 로컬 서버에 프로젝트를 실행시킬 수 있습니다.

![스크린샷 2018-11-04 오후 11.47.52](https://i.imgur.com/IlfTg5p.png)

이제 프로젝트를 살펴볼 수 있습니다.
