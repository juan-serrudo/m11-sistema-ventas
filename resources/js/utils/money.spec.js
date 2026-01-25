import { describe, expect, it } from 'vitest';
import { formatCurrency } from './money.js';

describe('formatCurrency', () => {
    it('formats numbers as currency', () => {
        expect(formatCurrency(1234.5)).toBe('$1,234.50');
    });

    it('returns empty string for invalid input', () => {
        expect(formatCurrency(Number.NaN)).toBe('');
    });
});
