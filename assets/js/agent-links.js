/** Both existing agent pages create opaque links through their own POST route. */
async function generateLink() {
    const form = document.getElementById('agentForm');
    if (form && !form.reportValidity()) return;

    const button = document.querySelector('[onclick="generateLink()"]');
    const output = document.getElementById('clientLink');
    const payload = new FormData();
    for (const name of ['firstName', 'lastName', 'description']) {
        payload.set(name, document.getElementById(name).value.trim());
    }
    payload.set('csrf', window.AGENT_LINK_CONFIG.csrf);

    if (button) button.disabled = true;
    output.value = '';
    try {
        const response = await fetch(window.location.pathname, {
            method: 'POST',
            body: payload,
            credentials: 'same-origin'
        });
        const result = await response.json();
        if (!response.ok || !result.url) {
            throw new Error(result.error || 'Unable to generate the client link.');
        }
        output.value = result.url;
    } catch (error) {
        alert(error.message || 'Unable to generate the client link. Please try again.');
    } finally {
        if (button) button.disabled = false;
    }
}

async function copyClientLink() {
    const input = document.getElementById('clientLink');
    if (!input.value.trim()) return;

    try {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            await navigator.clipboard.writeText(input.value);
        } else {
            input.select();
            if (!document.execCommand('copy')) return;
        }
        const button = document.getElementById('copyLinkBtn');
        if (button) {
            const label = button.textContent;
            button.textContent = 'Copied!';
            setTimeout(() => { button.textContent = label; }, 2000);
        }
    } catch (error) {
        input.select();
    }
}
