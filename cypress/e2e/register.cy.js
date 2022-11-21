describe("Register page", () => {
    it("Register test", () => {
        cy.visit("http://localhost:8000/register");
        cy.get(".container").get("#name").type("Ilham", { force: true });
        cy.get(".container").get("#nim").type("2041720162", { force: true });
        cy.get(".container")
            .get("#profile_picture")
            .selectFile("cypress/fixtures/vv.png", { force: true });
        cy.get(".container")
            .get("#ktm_picture")
            .selectFile("cypress/fixtures/vv.png", { force: true });
        cy.get(".container").get("#username").type("ilham12", { force: true });
        cy.get(".container").get("#password").type("12345678", { force: true });
        cy.get(":nth-child(1) > .btn").click();

        cy.get(".container").get("#username").type("ilham12", { force: true });
        cy.get(".container").get("#password").type("12345678", { force: true });
        cy.get(".btn-001").click();
    });
});
