describe("empty spec", () => {
    it("Login and update test", () => {
        cy.visit("http://localhost:8000/login");
        cy.get(".card-header").contains("Login");
        cy.get(".container").get("#username").type("admin", { force: true });
        cy.get(".container").get("#password").type("12345678", { force: true });
        cy.get(".btn-001").click();
    });
});
