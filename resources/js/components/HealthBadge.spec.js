import { describe, expect, it } from 'vitest';
import { mount } from '@vue/test-utils';
import { defineComponent } from 'vue';

describe('HealthBadge', () => {
    it('renders the provided status', () => {
        const HealthBadge = defineComponent({
            props: {
                status: {
                    type: String,
                    required: true,
                },
            },
            template: '<span data-testid="badge">{{ status }}</span>',
        });

        const wrapper = mount(HealthBadge, {
            props: {
                status: 'ok',
            },
        });

        expect(wrapper.get('[data-testid="badge"]').text()).toBe('ok');
    });
});
