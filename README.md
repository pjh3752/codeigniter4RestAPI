## idus development challenges

## Login
```
[POST] /login  회원 로그인(인증)

Parameters
    email     string 사용자 이메일
    password  string 사용자 암호
Headers
     Context-Type: application/json
```

## Users
```
[GET] /users  여러 회원 목록 조회

Parameters
    name   string 사용자 이름으로 조회 (Example: juho)   
    email  string 사용자 이메일로 조회 (Example: test@abc.com)
    limit  int    출력 갯수
    offset int    출력 시작 row
Headers
     Context-Type: application/json
     Authorization: Bearer {access_token}
```

```
[GET] /users/{id}  단일 회원 상세 정보 조회

Parameters
    id int (requrid) 사용자 코드
Headers
     Context-Type: application/json
     Authorization: Bearer {access_token}
```

```
[POST] /users 회원 가입

Parameters
     name      string (required) 사용자 이름
     nickname  string (required) 사용자 별명
     password  string (required) 사용자 비밀번호
     phone     string (required) 사용자 전화번호
     email     string (required) 사용자 이메일 
     gender    string 사용자 성별
Headers
     Context-Type: application/json
     Authorization: Bearer {access_token}
```
