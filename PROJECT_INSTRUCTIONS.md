# Review App - Project Instructions

## Project Overview
This is a Laravel-based web application for managing company reviews, campaigns, and feedback collection. The application allows companies to create profiles, manage review campaigns, and collect various types of feedback including reviews, surveys, ratings, testimonials, and leads.

## Project Structure

### Core Components
- **Companies**: Manage company profiles and information
- **Campaigns**: Handle different types of feedback collection campaigns
- **Reviews**: Store and manage user feedback
- **Users**: Handle user authentication and management

### Database Structure
The application uses the following main tables:
- `users`: Store user information
- `companies`: Store company profiles
- `campaigns`: Manage feedback collection campaigns
- `reviews`: Store collected feedback

### Key Features
1. Company Management
   - Company profile creation and management
   - Company description and logo management
   - Website integration

2. Campaign Management
   - Multiple campaign types (review, survey, rating, testimonial, lead)
   - Campaign status tracking
   - Campaign analytics

3. Review System
   - Multiple feedback types
   - Rating system
   - Review moderation

## Technical Setup

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js and NPM
- Laravel Vite
- MySQL/SQLite database

### Installation Steps
1. Clone the repository
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install JavaScript dependencies:
   ```bash
   npm install
   ```
4. Configure environment:
   - Copy `.env.example` to `.env`
   - Update database configurations
   - Generate application key:
     ```bash
     php artisan key:generate
     ```
5. Run migrations:
   ```bash
   php artisan migrate
   ```
6. Build assets:
   ```bash
   npm run dev
   ```
7. Start the development server:
   ```bash
   php artisan serve
   ```

## Development Guidelines

### Coding Standards
- Follow PSR-12 coding standards
- Use Laravel best practices and conventions
- Implement proper error handling and validation
- Write descriptive commit messages

### File Organization
- Controllers in `app/Http/Controllers`
- Models in `app/Models`
- Views in `resources/views`
- Routes in `routes/web.php`
- Database migrations in `database/migrations`

### Key Files
- `routes/web.php`: Main routing file
- `app/Models/`: Contains all model definitions
- `resources/views/`: Contains all Blade templates
- `config/`: Application configuration files

### Frontend
- Uses Tailwind CSS for styling
- JavaScript/Vite for asset compilation
- Blade templating engine for views

### Database
#### Companies Table
- id (primary key)
- name
- description
- logo_url
- website
- status
- timestamps

#### Campaigns Table
- id (primary key)
- company_id (foreign key)
- title
- slug
- description
- type (enum: review, survey, rating, testimonial, lead)
- status (enum: active, inactive)
- timestamps

#### Reviews Table
- id (primary key)
- campaign_id (foreign key)
- content
- rating
- status
- timestamps

## Deployment
1. Ensure all dependencies are installed
2. Set environment variables for production
3. Optimize application:
   ```bash
   php artisan optimize
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
4. Build assets for production:
   ```bash
   npm run build
   ```

## Security Considerations
- Implement proper authentication and authorization
- Validate all user inputs
- Use CSRF protection
- Implement rate limiting where necessary
- Keep dependencies updated

## Maintenance
- Regularly update dependencies
- Monitor error logs
- Backup database regularly
- Clean up old data periodically

## Testing
- Write unit tests for models and controllers
- Implement feature tests for key functionality
- Run tests before deploying:
  ```bash
  php artisan test
  ```

## Support
For any issues or questions:
1. Check the Laravel documentation
2. Review the codebase and comments
3. Contact the development team

## License
This project is licensed under the MIT license.