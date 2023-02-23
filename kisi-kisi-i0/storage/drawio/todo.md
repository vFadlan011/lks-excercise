# With Apply

## Auth:

-   Login, detect is it admin or not
-   Register, only create non-admin user

## User:

-   Find jobs \*filter: category, regional
-   Job list: \*filter: category, regional
    -   Company-job pair list
    -   Jobs list

## Admin:

-   Manage company profiles
-   Manage job vacancies

# Schema

## Table: `users`, `companies`, `job_vacancies`, `job_applications`, `job_categories`, `regionals`

### `users`

| column   | type               | length |
| :------- | :----------------- | :----- |
| id       | uuid               | 36     |
| username | string             | 30     |
| is_admin | boolean, default:0 | 1      |
| password | string             | 60     |
| remember | remember token     |        |

### `companies`

| column      | type   | length |
| :---------- | :----- | :----- |
| id          | uuid   | 36     |
| name        | string | 60     |
| description | text   |        |
| logo        | string | 60     |

### `job_vacancies`

| column      | type                      | length |
| :---------- | :------------------------ | :----- |
| id          | uuid                      | 36     |
| title       | string                    | 100    |
| company     | foreign:companies,id      |        |
| regionals   | foreign:regionals,id      |        |
| category    | foreign:job_categories,id |        |
| description | text                      |        |
| due_to      | bigint                    |        |
| created_at  | bigint                    |        |
| updated_at  | bigint                    |        |

### `job_applications`

| column     | type                                      | length |
| :--------- | :---------------------------------------- | :----- |
| user_id    | foreign:users,id                          |        |
| vacancy_id | foreign:job_vacancies                     |        |
| status     | enum:pending,accepted,rejected, cancelled |        |
| date       | bigint                                    |        |

### `job_categories`

| column   | type   | length |
| :------- | :----- | :----- |
| id       | id     |        |
| category | string | 50     |

## Pages

```
User:
/

/profile # show profile, applied job
/profile/edit
/profile/{user_id} # show profile

/search # params: q, category

/company # view company list
/company/{company_id} # view job list on company

/vacancy # view job list
/vacancy/{vacancy_id} # view job vacancy detail

Admin:
/admin # dashboard, showing statistic

/admin/company # dashboard, showing company list. Link to /admin/company/add
/admin/company/{company_id} # view company detail and it's job list

/admin/company/{company_id}/edit
/admin/company/{company_id}/delete
/admin/company/add


/admin/vacancy # showing vacancy list
/admin/vacancy/{vacancy_id} # view job vacancy detail and it's applicants

/admin/vacancy/{vacancy_id}/{user_id}/approve # approve applicant
/admin/vacancy/{vacancy_id}/{user_id}/reject # reject applicant

/admin/vacancy/add # form to add vacancy
/admin/vacancy/edit/{vacancy_id}
/admin/vacancy/delete/{vacancy_id}


Auth:
/login
/register
```
