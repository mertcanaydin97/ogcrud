# OGCRUD Brand Identity Guide

## Color Palette

### Primary Colors
- **Primary Blue**: `#6366f1` (Indigo-500)
- **Primary Dark**: `#4f46e5` (Indigo-600)
- **Primary Light**: `#818cf8` (Indigo-400)

### Secondary Colors
- **Success Green**: `#10b981` (Emerald-500)
- **Warning Orange**: `#f59e0b` (Amber-500)
- **Error Red**: `#ef4444` (Red-500)
- **Info Blue**: `#3b82f6` (Blue-500)

### Neutral Colors
- **Dark Gray**: `#1f2937` (Gray-800)
- **Medium Gray**: `#6b7280` (Gray-500)
- **Light Gray**: `#f3f4f6` (Gray-100)
- **White**: `#ffffff`

## Typography

### Font Family
- **Primary**: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif
- **Monospace**: JetBrains Mono, "Fira Code", Consolas, monospace

### Font Weights
- **Light**: 300
- **Regular**: 400
- **Medium**: 500
- **Semibold**: 600
- **Bold**: 700

## Logo Guidelines

### Logo Usage
- Minimum size: 32px height
- Clear space: 1x logo height on all sides
- Always use on light or dark backgrounds with sufficient contrast

### Logo Variations
- **Primary**: Full color on light backgrounds
- **Inverted**: White on dark backgrounds
- **Monochrome**: Single color for small applications

## Design Principles

### Modern & Clean
- Minimalist design approach
- Generous white space
- Subtle shadows and rounded corners
- Smooth transitions and animations

### Accessible
- WCAG 2.1 AA compliance
- High contrast ratios
- Clear visual hierarchy
- Keyboard navigation support

### Professional
- Consistent spacing and alignment
- Professional color usage
- Clear call-to-action buttons
- Intuitive user interface

## Component Guidelines

### Buttons
- **Primary**: Blue background with white text
- **Secondary**: White background with blue border and text
- **Success**: Green background with white text
- **Warning**: Orange background with white text
- **Danger**: Red background with white text

### Cards & Panels
- White background with subtle shadow
- Rounded corners (8px radius)
- Consistent padding (16px, 24px, 32px)

### Forms
- Clean input fields with subtle borders
- Clear validation states
- Helpful error messages
- Consistent spacing between elements

## Implementation

### CSS Variables
```css
:root {
  /* Primary Colors */
  --ogcrud-primary: #6366f1;
  --ogcrud-primary-dark: #4f46e5;
  --ogcrud-primary-light: #818cf8;
  
  /* Secondary Colors */
  --ogcrud-success: #10b981;
  --ogcrud-warning: #f59e0b;
  --ogcrud-error: #ef4444;
  --ogcrud-info: #3b82f6;
  
  /* Neutral Colors */
  --ogcrud-dark: #1f2937;
  --ogcrud-gray: #6b7280;
  --ogcrud-light: #f3f4f6;
  --ogcrud-white: #ffffff;
}
```

### Usage Examples
```css
/* Primary Button */
.btn-primary {
  background-color: var(--ogcrud-primary);
  color: var(--ogcrud-white);
  border: none;
  border-radius: 8px;
  padding: 12px 24px;
  font-weight: 500;
  transition: background-color 0.2s ease;
}

.btn-primary:hover {
  background-color: var(--ogcrud-primary-dark);
}

/* Card Component */
.card {
  background-color: var(--ogcrud-white);
  border-radius: 8px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  padding: 24px;
}
```

## Brand Voice

### Tone
- **Professional**: Clear, concise, and authoritative
- **Friendly**: Approachable and helpful
- **Modern**: Up-to-date with current best practices
- **Reliable**: Stable, secure, and trustworthy

### Messaging
- Focus on simplicity and efficiency
- Emphasize developer experience
- Highlight modern Laravel integration
- Promote clean, maintainable code

---

*This brand guide ensures consistency across all OGCRUD materials and implementations.*
