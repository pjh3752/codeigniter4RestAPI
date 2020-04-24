# idus-challenge
## idus development challenges

## Users
```
[GET] /users
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
[POST] /users
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
