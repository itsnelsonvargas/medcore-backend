# Laravel Backend Setup Checklist

## 1️⃣ Project Foundations (do this first)
- Set **app name, environment, timezone**
- `.env` separation (local / staging / production)
- Force **HTTPS** in production
- Set `APP_KEY`
- Configure **logging** (daily logs)

---

## 2️⃣ Database & Data Integrity
- Database connection (MySQL / PostgreSQL)
- Migrations + proper indexing
- Foreign key constraints
- Soft deletes where needed
- UUIDs for public-facing IDs
- Seeders for test/demo data

---

## 3️⃣ Authentication & Authorization
- Token auth (**Sanctum** or Passport)
- Role-based access (Admin / Doctor / Patient)
- Policies & Gates
- Password hashing + reset flow
- Email verification (if needed)

---

## 4️⃣ API Design Essentials
- RESTful routes
- API versioning (`/api/v1`)
- Request validation (Form Requests)
- API Resources (response formatting)
- Consistent error responses
- Rate limiting (important for healthcare)

---

## 5️⃣ Security (non-negotiable 🔐)
- CSRF (if hybrid)
- CORS setup
- Input sanitization
- SQL injection protection (Eloquent)
- Audit logs (who accessed what)
- Hide sensitive fields
- Secure `.env` & secrets
- Password rules (strong by default)

---

## 6️⃣ Testing Setup
- **Pest** configured
- Feature tests (Auth, Patients, Doctors)
- Database transactions for tests
- Factories for all models
- Test coverage for critical flows

---

## 7️⃣ Logging, Monitoring & Auditing
- Structured logs
- Failed login tracking
- Request/response logging (careful with PHI)
- Error monitoring (Sentry, Bugsnag)
- Audit tables (access, updates)

---

## 8️⃣ Performance & Scalability
- Query optimization
- Eager loading
- Caching (Redis / file cache)
- Queue workers
- Job retries & failures
- Pagination everywhere

---

## 9️⃣ File & Media Handling
- Secure file uploads
- Storage abstraction (local / S3)
- Access-controlled downloads
- Virus scanning (optional but ideal)

---

## 🔟 API Documentation
- OpenAPI / Swagger
- Endpoint examples
- Auth instructions
- Error codes reference
- Postman collection

---

## 1️⃣1️⃣ Dev Experience & Code Quality
- PSR-12 formatting
- Prettier / Pint
- Clear folder structure
- Meaningful commit messages
- Git hooks (optional)

---

## 1️⃣2️⃣ Deployment & CI/CD
- Environment-based configs
- GitHub Actions
- Auto testing on PR
- Database backups
- Zero-downtime deploy
- Rollback plan

---

## 1️⃣3️⃣ Compliance Mindset (Healthcare)
- Least-privilege access
- Data retention policy
- Soft delete medical records
- Immutable logs
- Encrypt sensitive columns
- Consent tracking (optional but pro-level)

---

## ⭐ Recommended Order (TL;DR)
1. Auth + Roles
2. DB schema + migrations
3. Security basics
4. API standards
5. Tests
6. Logs & audit
7. Performance
8. Docs & deployment
